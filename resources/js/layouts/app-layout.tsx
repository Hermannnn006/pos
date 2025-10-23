import { ReactNode, useEffect, useRef, useState } from "react";
import Header from "@/components/template/header";
import Sidebar from "@/components/template/sidebar";
import clsx from "clsx";

interface AppLayoutProps {
  children: ReactNode;
}

const AppLayout: React.FC<AppLayoutProps> = ({ children }) => {
  const [sidebarOpen, setSidebarOpen] = useState(false);
  const [darkMode, setDarkMode] = useState(false);
  const sidebarRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    const handleClickOutside = (e: MouseEvent) => {
      if (
        sidebarOpen &&
        sidebarRef.current &&
        !sidebarRef.current.contains(e.target as Node) &&
        window.innerWidth < 768
      ) {
        setSidebarOpen(false);
      }
    };
    document.addEventListener("mousedown", handleClickOutside);
    return () => document.removeEventListener("mousedown", handleClickOutside);
  }, [sidebarOpen]);

  useEffect(() => {
    const root = document.documentElement;
    if (darkMode) {
      root.classList.add("dark");
    } else {
      root.classList.remove("dark");
    }
  }, [darkMode]);

  return (
    <div
      className={clsx(
        "min-h-screen transition-colors duration-300",
        "bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100"
      )}
    >
      <Header
        onMenuClick={() => setSidebarOpen(!sidebarOpen)}
        onToggleDarkMode={() => setDarkMode(!darkMode)}
        darkMode={darkMode}
      />

      <div className="flex relative">
    
        {sidebarOpen && (
          <div className="fixed inset-0 bg-black/30 md:hidden z-30"></div>
        )}

        <div ref={sidebarRef}>
          <Sidebar open={sidebarOpen} />
        </div>

        <main className="flex-1 p-6 transition-all">{children}</main>
      </div>
    </div>
  );
};

export default AppLayout;
