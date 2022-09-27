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

<h1 class="flex mt-5 items-center text-5xl font-extrabold dark:text-gray-900">MichEl Stream<span class="bg-blue-100 text-blue-800 text-2xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-2">PRO</span></h1>

   
<h1 class="my-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-gray-600">Get back to growth with <span class="text-blue-600 dark:text-blue-500">the world's #1</span> Streaming Service.</h1>
<p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Here at MichEl Stream we focus on markets where technology, innovation, and capital can unlock long-term value and drive business growth.</p>
    </div>
    

<div id="animation-carousel" class="relative" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-200 ease-linear absolute inset-0 transition-all transform" data-carousel-item="">
            <img src="/images/login-pic.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="duration-200 ease-linear absolute inset-0 transition-all transform -translate-x-full z-10" data-carousel-item="">
            <img src="/images/login-pic.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="duration-200 ease-linear absolute inset-0 transition-all transform translate-x-0 z-20" data-carousel-item="active">
            <img src="/images/login-pic.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="duration-200 ease-linear absolute inset-0 transition-all transform translate-x-full z-10" data-carousel-item="">
            <img src="/images/login-pic-4.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-200 ease-linear absolute inset-0 transition-all transform" data-carousel-item="">
            <img src="/images/login-pic-5.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev="">
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/jpg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next="">
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/jpg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

    
    
    </GuestLayout>
    
</template>

