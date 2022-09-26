<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import {ref,computed,  onMounted } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const link = ref("/videos/video1.webm")
const vid = ref()
const vid2 = ref()
const _stream =ref()
const medi = ref()
const vdata = ref([])
const vidOptions = {
  video: false,
  audio: {
    echoCancellation: true,
    noiseSuppression: true,
    sampleRate: 44100
  }
}
 
 function startRec(){
     //show the hidden video element first to stream into
     vid.value.style="display:block;border-radius:10px"
     //To show audio recording gif
    let recA = document.querySelector("#audio-rec")
    recA.className="block mx-auto rounded-xl h-20 contain mb-3"
     
    vid2.value.style="display:none"
    navigator.mediaDevices.getUserMedia(vidOptions) .then((stream)=>{
       _stream.value,vid.value.srcObject = stream
      vid.value.className+=" block mx-auto"
     medi.value = new MediaRecorder(stream)
     medi.value.start()
     medi.value.ondataavailable = (e) => {
       vdata.value.push(e.data);
     }
     }, (err)=> alert(err));
}


function stopRec(){
  //To hide audio recording gif
  let recA = document.querySelector("#audio-rec")
  recA.className="hidden mx-auto rounded-xl h-20 contain mb-3"
     
  let tracks = vid.value.srcObject.getTracks();
  tracks.forEach((track) => track.stop());
  medi.value.stop()
  medi.value.onstop = (e) => {
  
  const blob = new Blob(vdata.value, { type: "audio/mp3" })
  vdata.value = []
  const vURL = window.URL.createObjectURL(blob);
   //vid.value.srcObject = ""
  _stream.value = vURL
  vid.value.style="display:none"
  vid2.value.style="display:block"
  vid2.value.src=vURL
  }
  //vid.value.srcObject = null;
}
</script>

<template>
  
    <div>
      
    </div>
     <div class="mt-8 max-w-80 bg-gradient-to-r from-pink-500 to-blue-300 px-5 py-2 pt-5 shadow rounded-xl"  >
       <div class="text-xl pb-3 text-white font-bold">
         Audio Record
       </div>
       <div class="divider"/>
       <img id="audio-rec" src="/images/audio-recording.gif" class="hidden mx-auto rounded-xl h-20 contain mb-3"/>
      <audio autoplay ref="vid"  class="hidden rounded-lg mx-auto" autopictureinpicture="true" controls >
       <source  type="video/webm">
     </audio>
     
      <audio autoplay ref="vid2" class="hidden rounded-lg mx-auto" autopictureinpicture="true" controls >
       <source >
     </audio>
     <div class="grid grid-cols-2 md:grid-cols-2 my-5 gap-3">
       <button @click="startRec()" class="p-1 px-2 rounded-xl text-white btn bg-blue-400">
         start
       </button>
       <button @click="stopRec" class="p-1 px-2 rounded-xl text-white btn bg-red-400">
         stop
       </button>
     </div>
     </div>
     
 
    
</template>

