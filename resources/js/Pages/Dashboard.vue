<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';






</script>

<template>

    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Web Feed
            </h2>
        </template>


        <div class="w-full bg-white p-12">
            <div class="header flex items-end justify-between mb-12">
                <div class="title">
                    <p class="text-4xl font-bold text-gray-800 mb-4">
                        Websites
                    </p>

                </div>
                
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
                <div v-for="datas in data" :key="datas.id"
                    class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto">
                    <a href="#" class="w-full block h-full">
                        <img alt="blog photo"
                            :src="datas.thumbnail"
                            class="max-h-40 w-full object-cover" />
                        <div class="bg-white  w-full p-4">
                            <p class="text-green-500 text-xl uppercase">
                                {{ datas.title }}
                            </p>
                           
                            <p class="truncate text-gray-400  font-light text-md">
                                {{datas.body}}
                            </p>
                            <div class="flex items-center mt-4">

                                <div class="flex flex-col justify-between text-sm">
                                    <Link :href="route('page', datas.slug)"
                                        class="underline text-lg text-gray-600 mb-3 hover:text-gray-900">
                                    visit site
                                    </Link>

                                </div>
                            </div>     
                        </div>
                    </a>
                </div>
            </div>
        </div>



    </BreezeAuthenticatedLayout>
</template>



<script>
export default {
    props: {
        data: Array,
    },

}

</script>