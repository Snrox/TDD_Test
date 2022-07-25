<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';



const form = useForm({
      website_id: null,
      title: null,
      img: null,
      description: null,
});


</script>

<template>

    <Head title="post-create" />

    <BreezeAuthenticatedLayout>


        <section class="h-screen mt-5 bg-gray-100 bg-opacity-50">
            <form class="container max-w-2xl mx-auto shadow-md md:w-3/4" @submit.prevent="form.post('/post-create')" >
                <div class="p-4 bg-gray-100 border-t-2 border-indigo-400 rounded-lg bg-opacity-5">
                    <div class="max-w-sm mx-auto md:w-full md:mx-0">
                        <div class="inline-flex items-center space-x-4">

                            <h1 class="text-gray-600">
                                CREATE NEW POST
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="space-y-6 bg-white">
                    <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                        <h2 class="max-w-sm mx-auto md:w-1/3">
                            Select Website
                        </h2>
                        <div class="max-w-sm mx-auto md:w-2/3">
                           
                               
                                <select v-model="form.website_id"
                                    class="block w-52 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                    >
                                    <option  v-for="datas in data" :key="datas.id" :value="datas.id">
                                        {{datas.title}}
                                    </option>
                                
                                </select>
                            

                        </div>
                    </div>
                    <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                        <h2 class="max-w-sm mx-auto md:w-1/3">
                            Title
                        </h2>
                        <div class="max-w-sm mx-auto md:w-2/3">
                            <div class=" relative ">
                                <input type="text"
                                    v-model="form.title"
                                    class=" rounded-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    placeholder="Title" />
                            </div>
                             <div class="mt-2 text-red-500" v-if="form.errors.title">{{ form.errors.title }}</div>

                        </div>
                    </div>
                    <hr />
                    <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                        <h2 class="max-w-sm mx-auto md:w-1/3">
                            Image URl
                        </h2>
                        <div class="max-w-sm mx-auto space-y-5 md:w-2/3">
                            <div>
                                <div class=" relative ">
                                    <input type="text"
                                        v-model="form.img"
                                        class=" rounded-lg  flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        placeholder="Url" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr />
                    <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                        <h2 class="max-w-sm mx-auto md:w-1/3">
                            Description
                        </h2>
                        <div class="max-w-sm mx-auto md:w-2/3">
                            <div class=" relative ">
                                <textarea type="text"
                                    v-model="form.description"
                                    class=" rounded-lg  flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    placeholder="Title" />
                            </div>
                         <div class="mt-2 text-red-500" v-if="form.errors.description">{{ form.errors.description }}</div>

                        </div>
                    </div>


                    <hr />
                    <div class="w-full px-4 pb-4 ml-auto text-gray-500 md:w-1/3">
                        <button type="submit"
                            class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </section>


    </BreezeAuthenticatedLayout>
</template>

<script>
export default {
   props: {
    data: Array,
  },

}

</script>