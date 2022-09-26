<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import NavGuest from '@/Components/Nav/Nav-guest.vue';
import SideMenu from '@/Components/Nav/Side-menu.vue';
import {ref,computed,  onMounted } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const showModal = computed(()=>{
  return modal.value
})
const modal = ref(false)
const check = ref({audio:false,video:false,screen:false})

function modalToggle(val){
   modal.value=val
}
function modalVisit(){
    if(check.value.audio || check.value.video || check.value.screen){
    location = "/record/"+setType(check.value)}
}

function setType(type){
  //for screen
  if(type.video == true && type.audio == true && type.screen==true){
    return "screen-audio"
  }
  if(type.audio == true && type.screen==true){
    return "screen-audio"
  }
  if(type.screen==true){
    return "screen-no-audio"
  }
  //For video
  if(type.video == true && type.audio==true){
    return "video-audio"
  }
  if(type.video == true && type.screen==true){
    return "screen-audio"
  }
  if(type.video == true){
    return "video-no-audio"
  }
  //For audio
  if(type.audio == true){
    return "audio"
  }
}

</script>


<template>

<!-- Modal toggle -->
<button @click="modalToggle(modal?false:true)" class="text-white bg-blue-700/90 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-xl text-xs px-4 py-1 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
  Record New
</button>

<!-- Main modal -->
<div ref="modal" v-if="showModal" id="authentication-modal" tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-gray-700 rounded-lg shadow dark:bg-gray-700">
            <button type="button" @click="modalToggle(modal?false:true)" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-200 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="grid grid-cols-1 justify-center items-center py-6 px-6 lg:px-8 ">
                <h3 class="mb-4 text-md font-bold text-gray-200 dark:text-white">Record New</h3>
                <hr class=" h-px bg-gray-200 border-0 dark:bg-gray-100/30">
                <div class="mb-4 mt-4 text-md font-bold text-gray-200 dark:text-white" >
                  Record From Camera
                <input v-model="check.video" id="bordered-checkbox-2" type="checkbox" name="bordered-checkbox" class="float-right w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                </div>
                <div class="mb-4 mt-4 text-md font-bold text-gray-200 dark:text-white" >
                  Record Audio
                <input v-model="check.audio" id="bordered-checkbox-2" type="checkbox" name="bordered-checkbox" class="float-right w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                </div>
                <div class="mb-4 mt-4 text-md font-bold text-gray-200 dark:text-white" >
                  Record From Screen
                <input v-model="check.screen" id="bordered-checkbox-2" type="checkbox"  name="bordered-checkbox" class="float-right w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                </div>
           
<button @click="modalVisit" v-if="check.video || check.audio || check.screen" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" >
  Start Record
</button>

<button @click="modalVisit" disabled v-else class="text-white bg-gray-500/50 focus:ring-4 focus:outline-none font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-3 md:mr-0" type="button" >
  Start Record
</button>

            </div>
        </div>
    </div>
</div> 
</template>