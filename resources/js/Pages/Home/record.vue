<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import {onMounted } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import recordVideo from '@/Pages/inc/record-video.vue'
import recordScreen from '@/Pages/inc/record-screen.vue'
import recordAudio from '@/Pages/inc/record-audio.vue'

defineProps(['type'])

</script>


<template>

  <GuestLayout :currentPage="'Record New'">
    <div >
      <recordVideo :playAudio="true" v-if="type=='video-audio'"/>
      <recordVideo :playAudio="false" v-if="type=='video-no-audio'"/>
    </div>
    <div>
      <recordScreen :audio="true" v-if="type=='screen-audio'"/>
      <recordScreen :audio="false" v-if="type=='screen-no-audio'"/>
    </div>
    <div  >
      <recordAudio v-if="type=='audio'"/>

    </div>
    </GuestLayout>
    
</template>

