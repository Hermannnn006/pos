import ProductCard from '@/components/product/product-card';
import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { cashier } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Cashier',
        href: cashier().url,
    },
];

export default function Index() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Cashier" />
            <div className="flex flex-col md:flex-row gap-4 px-4 pt-4">
                <div className="w-full md:w-8/12">
                <div className="grid grid-cols-2 lg:grid-cols-4 gap-6">
                <ProductCard />
                <ProductCard />
                <ProductCard />
                <ProductCard />
                <ProductCard />
                </div>
                </div>
                <div className="w-full md:w-5/12">
                Keranjang
                </div>
            </div>
        </AppLayout>
    );
}
