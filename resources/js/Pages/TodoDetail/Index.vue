<template>
  <div class="bg-white h-full items-center pb-32">
    <Header :user="this.user" />
    <!-- <div class="container h-full max-w-7xl px-4 sm:px-6">
      <div
        class="grid grid-rows-3 grid-flow-col mt-10 box-border p-4 flex flex-row bg-green-500 rounded-lg"
      >
        <div>
          <img
            class="inline rounded border-2 w-auto"
            :src="'/storage' + this.todo.image"
          />
        </div>
        <div>
          <h1 class="text-3xl text-white mt-2 inline-block">
            {{ this.todo.title }}
          </h1>
        </div>
        <div>
          <p class="text-lg font-medium py-2 text-white break-words">
            {{ this.todo.desc }}
          </p>
        </div>
      </div>
    </div> -->
    <div class="container h-full max-w-7xl px-4 sm:px-6">
      <div
        class="grid grid-cols-1 bg-green-500 mt-10 box-border p-4 rounded-lg flex flex-row"
      >
        <div class="grid grid-cols-2">
          <div>
            <img
              class="inline rounded border-2 w-auto"
              :src="'/storage' + this.todo.image"
            />
          </div>
          <div class="grid grid-cols-1 pl-2">
            <div>
              <h1 class="text-3xl text-white mt-2 inline-block">
                {{ this.todo.title }}
              </h1>
            </div>
            <div class="h-60">
              <p class="text-lg font-medium py-2 text-white break-words">
                {{ this.todo.desc }}
              </p>
            </div>
          </div>
        </div>
        <!-- ... -->
      </div>
    </div>
  </div>
</template>

<script>
import Header from '../../Components/Header'
export default {
  components: {
    Header,
  },

  props: ['todo', 'user'],

  mounted() {
    console.log(this.todo)
  },
}
</script>

<style></style>
