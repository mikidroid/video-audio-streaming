<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import {ref, watch, onMounted } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import videoList from '@/Pages/inc/video-list.js'
import searchA  from 'search-array'
  //constants
  const videoL = ref(videoList)
  const searchVal = ref("")
  const loading = ref(false)

  watch(searchVal,(newV)=>{
    loading.value = true
    searchAudio(newV)
    loading.value = false
  })
  
  //functions
  function sortList(val){
    if(val== "date"){
     let _videoList = videoL.value.sort((a,b)=>{
        return a.last_modified - b.last_modified
     })
     videoL.value = _videoList
    }
    if(val== "views"){
     let _videoList = videoL.value.sort((a,b)=>{
        return b.views - a.views
     })
     videoL.value = _videoList
    }
    if(val== "size"){
     let _videoList = videoL.value.sort((a,b)=>{
        return a.size - b.size
     })
     videoL.value = _videoList
    }
    else{
       let _videoList = videoL.value.sort((a,b)=>{
         let val1 = a.name.toLowerCase()
         let val2 = b.name.toLowerCase()
         if(val1 < val2){
           return -1
         }
         if(val1 > val2){
           return 1
         }
        return 0
       })
       videoL.value = _videoList
    } 
  }
  //-----------
  function searchAudio(val){
      videoL.value = videoList
     let s = new searchA(videoL.value)
    let _AL = s.query(val)
    videoL.value = _AL 
  }
  
</script>


<template>
  
  <GuestLayout :currentPage="'Video Recordings'">

    <div class="grid grid-cols-4 gap-2 items-center my-3">
     
     <input v-model="searchVal" class="col-span-3 border-none p-1 px-5 rounded-lg" placeholder="Lookup Items..."  /> 
     <button class="rounded-xl p-1 text-white px-3 bg-gray-500">Search</button>
     
    </div>
    
<div class="overflow-x-auto rounded-xl relative shadow-md sm:rounded-lg">
    <table class=" w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Recording
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        Title
                    </div>
                </th>
                <th @click="sortList('views')" scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        Views
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                    </div>
                </th>
                <th @click="sortList('size')" scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        Size
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                    </div>
                </th>
                <th scope="col" @click="sortList('date')" class="py-3 px-6">
                    Modified
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in videoL" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="rounded-xl" :src="item.recording" />
                </th>
                <td class="py-4 px-6">
                    {{item.title}}
                </td>
                <td class="py-4 px-6">
                    {{item.views}}
                </td>
                <td class="py-4 px-6">
                    {{item.size}}MB
                </td>
                <td class="py-4 px-6">
                    {{item.last_modified}}
                </td>
                <td class="py-4 px-6 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

    </GuestLayout>
    
</template>

