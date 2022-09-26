<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import {ref,  onMounted } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})

</script>

<template>
  
  <GuestLayout :noSidebar="true" :breadcrumbsHide="true">
    <Head title="Welcome" />
    <div class="container my-5">

<h1 class="flex items-center text-5xl font-extrabold dark:text-white">MichEl Stream<span class="bg-blue-100 text-blue-800 text-2xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-2">PRO</span></h1>

   
<h1 class="my-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Get back to growth with <span class="text-blue-600 dark:text-blue-500">the world's #1</span> Streaming Service.</h1>
<p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Here at MichEl Stream we focus on markets where technology, innovation, and capital can unlock long-term value and drive business growth.</p>

    </div>
    </GuestLayout>
    
</template>

