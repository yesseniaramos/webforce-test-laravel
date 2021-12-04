<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Product</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <form @submit.prevent="submit" class="mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Name</label>
                                <input
                                    id="name"
                                    v-model="newProduct"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Name"
                                />
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Slug</label>
                                <input
                                    id="slug"
                                    v-model="form.slug"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Slug"
                                />
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Description</label>
                                <input
                                    id="description"
                                    v-model="form.description"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Descripción"
                                />
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Price</label>
                                <input
                                    id="price"
                                    v-model="form.price"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Precio"
                                />
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Status</label>
                                <input
                                    type="checkbox"
                                    :checked="form.status"
                                    v-model="form.status"
                                    class="appearance-none checked:bg-blue-600 checked:border-transparent">
                            </div>
                        </div>

                        <div class='flex justify-end md:gap-8 gap-4 pt-5 pb-5 pr-5'>
                            <inertia-link
                                :href="route('products.index')"
                                class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="button">
                                Cancel
                            </inertia-link>
                            <button
                                type="submit"
                                class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'
                            >
                                Save
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import AppLayout from "@/Layouts/Authenticated"
import Slugify from 'slugify'

export default {
    components: {
        AppLayout,
        Link
    },
    props: ["product"],
    data() {
        console.log(this.$props.product.status);
        return {
            newProduct: {
                get(){
                    return this.form.name
                },
                set(newVal){
                    this.form.product = newVal
                }
            },
            form: {
                name: this.$props.product.name,
                slug: this.$props.product.slug,
                description: this.$props.product.description,
                price: this.$props.product.price,
                status: Boolean(this.$props.product.status)
            },
        };
    },
    computed: {
        newProduct: {
            get(){
                this.form.slug = Slugify(this.form.name, {
                    lower: true,
                    strict: true
                })
                return this.form.name
            },
            set(newVal){
                this.form.name = newVal
            }
        }
    },
    methods: {
        submit() {
            this.$inertia.put(
                route("products.update", this.$props.product.id),
                this.form
            );
        },
    },
};
</script>
