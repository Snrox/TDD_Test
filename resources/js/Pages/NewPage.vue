<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link, useForm} from "@inertiajs/inertia-vue3";


const form = useForm({
      email: null,
      website_id: null,
});



</script>

<template>
    <div class="bg-indigo-900 relative overflow-hidden">
        <img
            :src="data.thumbnail"
            class="absolute h-full w-full object-cover"
        />
        <div class="inset-0 bg-black opacity-25 absolute"></div>

        <div
            class="container mx-auto px-6 md:px-12 relative z-10 flex items-center py-32 xl:py-40"
        >
            <div class="w-full flex flex-col items-center relative z-10">
                <h1
                    class="font-extrabold text-7xl text-center sm:text-8xl text-white leading-tight"
                >
                    {{ data.title }}
                </h1>

                <p
                    class="font-extrabold text-center text-yellow-400 leading-tight"
                >
                    {{ data.body }}
                </p>


  <div class="items-center mt-5">
            <form
                @submit.prevent="form.post('/subscribe',{
                    preserveScroll: true,
                    onSuccess: () => form.reset('email'),
                })"
                class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center"
            >
                <div class="relative">
                    
                    <input
                        type="email"
                        v-model="form.email"
                        required
                        class="rounded-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        placeholder="Email"
                    />

                </div>
                <button
                    :disabled="form.processing"
                    class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-orange-600 rounded-lg shadow-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                    type="submit"
                >
                    Subscribe
                </button>
            </form>
             <div class="mt-2 text-red-500" v-if="form.errors.email">{{ form.errors.email }}</div>
    </div>

            </div>

            
        </div>

      

        <div
            v-for="posts in post"
            :key="posts.id"
            class="container mb-12 mx-auto px-6 md:px-12 bg-white overflow-hidden relative lg:flex lg:items-center"
        >
            <div class="w-full py-12 px-4 sm:px-6 lg:py-16 lg:px-8 z-20">
                <h2 class="text-3xl font-extrabold text-black sm:text-4xl">
                    <span class="block">
                        {{ posts.title }}
                    </span>
                </h2>
                <p class="text-md mt-4 text-gray-400">
                    {{ posts.description }}
                </p>
            </div>
            <div class="flex items-center gap-8 p-8 lg:p-24">
                <img :src="posts.img" class="rounded-lg w-2/2" alt="Tree" />
            </div>
        </div>
    </div>
</template>

<script>

export default {
    
    props: {
        data: Object,
        post: Array,
    },

    data()
    {
       
         this.form.website_id = this.data.id ;
       
    }

};
</script>
