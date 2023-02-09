<script setup>

import { computed, onMounted, onUnmounted, ref } from '@vue/runtime-core';    


let datas = ref([])

async function fetchData()
{

  const headers = { "Content-Type": "application/json" };
  await fetch("http://localhost/testwp/wp-json/crud-restapi/v1/posts", { headers })
  .then(response => response.json())
  .then(data => ( datas.value = data));
    
}

function submitdata(){
  let doctor = {
      name: 'name'+Math.random(3,9),
      email:"email"+Math.random(3,9)+"@gmail.com"
  }
  fetch('http://localhost/testwp/wp-json/crud-restapi/v1/posts',{
    method:  'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(doctor)
  }).then(res=> fetchData())
  
}

onMounted(()=>{
    
   fetchData()
})

onUnmounted(()=>{
  
})


</script>
<template>
  <div>

    <h2>HOME VIEW</h2>
    <div class="data" >
      <li v-for="item in datas" :key="item.doctor_id">
      {{ item.name }} => {{ item.email }}
      </li>
    </div>
    <button @click="fetchData"> get data</button>
    <button @click="submitdata">submit</button>

  </div>
  </template>
