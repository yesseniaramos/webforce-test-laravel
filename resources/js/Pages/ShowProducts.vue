<template>
    <app-layout>
        <template #header>
            <h1 class="text-center text-2x1 font-bold leading-7 text-gray-300 sm:text-3x1 sm:truncate py-4 bg-gradient-to-1 from-indigo-500 to-indigo-800">Products</h1>
        </template>

        <div class="py-12">
            <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg">
                <Link
                    :href="route('products.create')"
                    class="flex-shrink-0 bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200" type="button"
                >
                    Create New Product
                </Link>
                <table class="rounded-t-lg mt-5 min-w-full mx-aout bg-gray-700 text-gray-100">
                    <thead>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Slug</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Description</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Price</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-100 uppercase tracking-wider">Actions</th>
                    </thead>
                    <tbody class="bg-gray-100 border-b boder-gray-600 text-gray-800">
                        <tr v-for="product in products" :key="product.id">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium"> {{ product.name}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium"> {{ product.slug}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium"> {{ product.description}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium"> {{ product.price}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input
                                    type="checkbox"
                                    :disabled="true"
                                    :checked="product.status"
                                    class="appearance-none checked:bg-blue-600 checked:border-transparent">
                            </td>
                            <td class="flex m-2">
                                <Link
                                    :href="route('products.edit', product.id)"
                                    class="flex-shrink-0 bg-blue-500 text-white text-base font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200"
                                >update</Link>
                                <Link
                                    method="delete"
                                    :href="route('products.destroy', product.id)"
                                    class="flex-shrink-0 bg-red-500 text-white text-base font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200"
                                >delete</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </app-layout>
</template>

<script>
    import BreezeNavLink from '@/Components/NavLink.vue'
    import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
    import { Link } from '@inertiajs/inertia-vue3'
    import AppLayout from "@/Layouts/Authenticated"
    export default {

        props:{
            products: Array
        },
        components: {
            AppLayout,
            BreezeNavLink,
            BreezeResponsiveNavLink,
            Link,
        }
    };
</script>
