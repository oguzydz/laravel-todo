<template>
  <div class="box-border h-full p-4 md:box-content bg-green-500 rounded-lg">
    <img
      class="inline rounded border-2"
      :src="'/storage'+this.img"
    />
    <h1 class="text-3xl text-white mt-2 inline-block"> {{this.title}}</h1>
    <p class="text-lg font-medium py-2 text-white break-words">
       {{this.desc}}
    </p>
    <a
      :href="'/manager/todo/' + this.id"
      class="self-end mt-2 inline-flex items-center justify-center px-3 py-1 border border-transparent text-base font-medium rounded-md text-green-600 bg-white hover:bg-indigo-50"
    >
      Detail
    </a>
  </div>
</template>

<script>
export default {
    props: [
        'title',
        'desc',
        'img',
        'id'
    ],
    mounted(){
        console.log(this)
    }
}
</script>

<style></style>
