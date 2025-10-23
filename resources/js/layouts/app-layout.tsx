import { ReactNode, useEffect, useRef, useState } from "react";
import Header from "@/components/template/header";
import Sidebar from "@/components/template/sidebar";
import clsx from "clsx";

interface AppLayoutProps {
  children: ReactNode;
}

const AppLayout: React.FC<AppLayoutProps> = ({ children }) => {
  const [sidebarOpen, setSidebarOpen] = useState(false);
  const [darkMode, setDarkMode] = useState(() => {
    if (typeof window !== "undefined") {
      return (
        localStorage.theme === "dark" ||
        (!("theme" in localStorage) &&
          window.matchMedia("(prefers-color-scheme: dark)").matches)
      );
    }
    return false;
  });

  const sidebarRef = useRef<HTMLDivElement>(null);
  const headerRef = useRef<HTMLDivElement>(null);

  // Tutup sidebar kalau klik di luar (hanya mobile),
  // gunakan 'click' (bukan mousedown) dan ignore klik yang berasal dari header.
  useEffect(() => {
    const handleClickOutside = (e: MouseEvent) => {
      // jika sidebar nggak open, skip
      if (!sidebarOpen) return;

      const target = e.target as Node | null;

      // jika klik di dalam sidebar -> jangan tutup
      if (sidebarRef.current && sidebarRef.current.contains(target)) return;

      // jika klik di dalam header (tombol menu) -> jangan tutup
      if (headerRef.current && headerRef.current.contains(target)) return;

      // hanya tutup di mobile (<768)
      if (window.innerWidth < 768) {
        setSidebarOpen(false);
      }
    };

    document.addEventListener("click", handleClickOutside);
    return () => document.removeEventListener("click", handleClickOutside);
  }, [sidebarOpen]);

  // Dark mode handling (persist)
  useEffect(() => {
    const root = document.documentElement;
    if (darkMode) {
      root.classList.add("dark");
      localStorage.theme = "dark";
    } else {
      root.classList.remove("dark");
      localStorage.theme = "light";
    }
  }, [darkMode]);

  return (
    <div
      className={clsx(
        "min-h-screen transition-colors duration-300",
        "bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100"
      )}
    >
      {/* header di atas (buat ref supaya klik tombol tidak dikejar listener) */}
      <div ref={headerRef} className="relative z-50">
        {/* PENTING: gunakan functional updater agar tidak terkena stale state */}
        <Header
          onMenuClick={() => setSidebarOpen((prev) => !prev)}
          onToggleDarkMode={() => setDarkMode((prev) => !prev)}
          darkMode={darkMode}
        />
      </div>

      <div className="flex relative">
        {/* Overlay clickable di bawah header (klik menutup sidebar) */}
        {sidebarOpen && (
          <div
            className="fixed inset-0 bg-black/40 md:hidden z-30"
            onClick={() => setSidebarOpen(false)}
          />
        )}

        {/* Sidebar */}
        <div ref={sidebarRef} className="z-40">
          <Sidebar open={sidebarOpen} />
        </div>

        {/* Main content */}
        <main className="flex-1 p-6 transition-all">{children}</main>
      </div>
    </div>
  );
};

export default AppLayout;
