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

const us = ref("heyyy")

onMounted(()=>{
  us.value = "mess"
})

</script>

<template>
  
  <GuestLayout>
    <Head title="Welcome" />
    <div class=" md:columns-2 m-8">
     <div class="m-2 rounded-md w-50 h-50 shadow-lg text-white bg-teal-500 p-8">
       <div :class="'font-bold text-4xl'">
      Its Droid
       </div>
       <div class="text-md">
      My name is the droid.
       </div>
    </div>
    
     <div class="m-2 rounded-md w-50 h-50 shadow-lg text-white bg-teal-500 p-8">
       <div class="font-bold text-4xl">
      Its Droid
       </div>
       <div class="text-md">
      My name is the droid. {{us}}
       </div>
    </div> 
    </div>
    </GuestLayout>
    
</template>

