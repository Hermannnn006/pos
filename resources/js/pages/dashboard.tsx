import AppLayout from "@/layouts/app-layout";

const Dashboard: React.FC = () => {
  return (
    <AppLayout>
      <div className="p-6 bg-gray-50 rounded-xl shadow-sm">
        <h1 className="text-2xl font-bold text-navy mb-4">Welcome to the Dashboard</h1>
        <p className="text-gray-600">
          This is the main content area. You can start building your e-commerce UI here.
        </p>
      </div>
    </AppLayout>
  );
};

export default Dashboard;
