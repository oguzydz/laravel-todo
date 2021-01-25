<template>
  <div class="bg-white h-auto items-center pb-32">
    <Header :user="this.user" />
    <div class="container max-w-7xl px-4 sm:px-6">
      <div class="grid grid-cols-3 gap-4 mt-10">
        <div v-for="todo in todos.data" :key="todo.id">
          <CardDetail
            :title="todo.title"
            :desc="todo.desc"
            :img="todo.image"
            :id="todo.id"
          />
        </div>
      </div>

      <div class="mt-20 -mb-1 flex flex-wrap">
        <template v-for="(link, key) in this.todos.links">
          <div
            v-if="link.url === null"
            :key="key"
            class="mr-1 mb-1 px-4 py-3 text-sm border rounded text-gray-400"
            :class="{ 'ml-auto': link.label === 'Next' }"
          >
            {{ link.label }}
          </div>
          <inertia-link
            v-else
            :key="key"
            class="mr-1 mb-1 px-4 py-3 text-sm border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
            :class="{
              'bg-white': link.active,
              'ml-auto': link.label === 'Next',
            }"
            :href="link.url"
          >
            {{ link.label }}
          </inertia-link>
        </template>
      </div>
    </div>
  </div>
</template>

<script>
import Header from '../../Components/Header'
import CardDetail from '../../Components/TodoCard'

export default {
  components: {
    Header,
    CardDetail,
  },
  props: ['user', 'todos'],
  mounted() {
    console.log(this.todos.links)
  },
}
</script>

<style></style>
Header
