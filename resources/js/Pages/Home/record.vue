<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import {ref,  onMounted } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import recordVideo from '@/Pages/inc/record-video.vue'
import recordScreen from '@/Pages/inc/record-screen.vue'
import recordAudio from '@/Pages/inc/record-audio.vue'

defineProps({
  type: String,
})

</script>


<template>
  <GuestLayout>
    <Head title="Welcome" />
    <div v-show="type=='video'" >
      <recordVideo/>
    </div>
    <div v-show="type=='screen'" >
      <recordScreen/>
    </div>
    <div v-show="type=='audio'" >
      <recordAudio/>
    </div>
    </GuestLayout>
    
</template>

