<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import {ref,  onMounted } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

</script>

<template>
  
  <GuestLayout :currentPage="'About'">
 
    <div>
      About
    </div>
    </GuestLayout>
    
</template>

