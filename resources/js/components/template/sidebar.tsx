import clsx from "clsx";
import { dashboard, cashier } from '@/routes';
import { Link, usePage } from "@inertiajs/react";

interface SidebarProps {
  open: boolean;
}

const menus = [
  { name: "Dashboard", icon: "📱", href: dashboard(), },
  { name: "Cashier", icon: "👔", href: cashier(), },
];

const Sidebar: React.FC<SidebarProps> = ({ open }) => {
  const page = usePage();

  return (
<aside
  className={clsx(
    "bg-light-blue dark:bg-gray-800 p-6 w-72 border-r dark:border-gray-700 transition-transform duration-300 fixed md:static left-0 min-h-[calc(100vh-4rem)] md:translate-x-0 z-40",
    "top-16",
    open ? "translate-x-0" : "-translate-x-full"
  )}
>
   <nav className="space-y-2">
        {menus.map((menu, i) => {
          const isActive = page.url.startsWith(
                              typeof menu.href === 'string'
                                  ? menu.href
                                  : menu.href.url
                            )

          return (
            <Link
              key={i}
              href={menu.href}
              prefetch
              className={clsx(
                "flex items-center justify-between px-4 py-3 font-semibold rounded-lg transition",
                "hover:bg-blue-300 hover:text-white dark:hover:bg-gray-700",
                isActive
                  ? "bg-pink-primary text-white dark:bg-gray-700"
                  : "text-navy dark:text-gray-200"
              )}
            >
              <span>{menu.name}</span>
              <span className="text-2xl">{menu.icon}</span>
            </Link>
          );
        })}
      </nav>
    </aside>
  );
};

export default Sidebar;
