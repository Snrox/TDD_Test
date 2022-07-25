<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';



</script>

<template>
    <Head title="posts" />

    <BreezeAuthenticatedLayout>
    
        
<div class="container mx-auto px-4 sm:px-8 max-w-3xl">



    <div class="py-8">
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">

            <div class="mb-5">
                    <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                <Link :href="route('post-create')" :active="route().current('post-create')" class=" text-sm text-gray-600 hover:text-gray-900">
                    Create New Post
                </Link>
</button>
                </div>
            
            
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">

                
    



                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Website
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Title
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Created at
                            </th>
                          
                              <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                options
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                       
                      
                        <tr v-for="datas in data" :key="datas.id">
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                               
                                   
                                    <div class="">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{datas.website_id}}
                                        </p>
                                    </div>
                                
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{datas.title}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{datas.created_at}}
                                </p>
                            </td>
                          
                              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                               
                               <div class="flex justify-center">

                                <button type="button" class="py-2 px-1 
                                 bg-green-600 hover:bg-green-700  focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center  font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg "> update
                                </button>

                                <button type="button" class="ml-3 py-2 px-1
                                 bg-red-600 hover:bg-red-700 focus:ring-indigo-500 focus:ring-offset-indigo-200  text-white w-full transition ease-in duration-200 text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg "> delete
                                </button>

                               </div>

                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
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
