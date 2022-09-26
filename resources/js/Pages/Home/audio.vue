<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

import {ref, watch, onMounted } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import audioList from '@/Pages/inc/audio-list.js'
import searchA  from 'search-array'
  //constants
  const audioL = ref(audioList)
  const searchVal = ref("")
  const loading = ref("")

  watch(searchVal,(newV)=>{
    loading.value = true
    searchAudio(newV)
    loading.value = false
  })
  
  //functions
  function sortList(val){
    if(val== "date"){
     let _audioList = audioL.value.sort((a,b)=>{
        return a.date - b.date
     })
     audioL.value = _audioList
    }
    else{
       let _audioList = audioL.value.sort((a,b)=>{
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
       audioL.value = _audioList
    }
  }
  //-----------
  function searchAudio(val){
      audioL.value = audioList
     let s = new searchA(audioL.value)
    let _AL = s.query(val)
    audioL.value = _AL 
  }
  
</script>

<template>
  
  <GuestLayout>
    <Head title="Welcome" />
    <div class="grid grid-cols-2 overflow-x-auto items-center">
      
     <div> 
     <input v-model="searchVal" class="border-none p-1 px-5 rounded-lg" placeholder="Search"  /> 
     <span v-if="loading">loading...</span>
 
     </div>
    </div>
       
    <div class="overflow-x-auto">
  <table class="min-w-full text-sm divide-y-2 divide-gray-200">
    <thead>
      <tr>
        <th
          @click="sortList('name')"
          class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap"
        >
          Name
        </th>
        <th
          class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap"
        >
          Type
        </th>
        <th @click="sortList('date')"
          class="px-4 py-2 font-bold  text-left text-gray-900 whitespace-nowrap"
        >
          Date
        </th>
      </tr>
    </thead>

    <tbody class="divide-y divide-gray-200">
      <tr v-for="item in audioL">
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
          {{item.name}}
        </td>
        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{item.type}}</td>
        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{item.date}}</td>
      </tr>

    </tbody>
  </table>
</div>


    </GuestLayout>
    
</template>

