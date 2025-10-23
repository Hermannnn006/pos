import Logo from "./logo";

interface HeaderProps {
  onMenuClick: () => void;
  onToggleDarkMode: () => void;
  darkMode: boolean;
}

const Header: React.FC<HeaderProps> = ({
  onMenuClick,
  onToggleDarkMode,
  darkMode,
}) => {
  return (
    <header className="bg-white dark:bg-gray-800 p-4 flex items-center justify-between border-b shadow-sm sticky top-0 z-50">
      {/* Left: Logo + Search */}
      <div className="flex items-center gap-4">
        <button onClick={onMenuClick} className="md:hidden text-gray-600 dark:text-gray-200">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            className="w-6 h-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>

        <Logo />

        <div className="hidden md:flex items-center bg-white dark:bg-gray-700 border-2 border-blue-300 dark:border-gray-600 rounded-lg overflow-hidden w-80">
          <input
            type="text"
            placeholder="Search"
            className="px-4 py-2 w-full outline-none text-gray-600 dark:text-gray-200 dark:bg-gray-700"
          />
          <button className="bg-blue-400 px-4 py-3 hover:bg-blue-500 transition">
            <svg
              className="w-5 h-5 text-white"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth={2}
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
              />
            </svg>
          </button>
        </div>
      </div>

      {/* Right: Icons + Dark mode toggle */}
      <div className="flex items-center gap-4">
        <button
          onClick={onToggleDarkMode}
          className="text-gray-600 dark:text-gray-200 hover:text-yellow-400 transition"
        >
          {darkMode ? (
            // ☀️ Icon Light Mode
            <svg xmlns="http://www.w3.org/2000/svg" className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 3v1m0 16v1m9-9h1M3 12H2m15.364-7.364l.707.707M6.343 17.657l-.707.707M17.657 17.657l.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
            </svg>
          ) : (
            // 🌙 Icon Dark Mode
            <svg xmlns="http://www.w3.org/2000/svg" className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z" />
            </svg>
          )}
        </button>
      </div>
    </header>
  );
};

export default Header;
