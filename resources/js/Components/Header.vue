<template>
  <div class="max-w-7xl mx-auto px-4 sm:px-6">
    <div
      class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10"
    >
      <div class="flex justify-start lg:w-0 lg:flex-1">
        <a href="#">
          <span class="sr-only">Workflow</span>
          <img
            class="h-8 w-auto sm:h-10"
            src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
            alt=""
          />
        </a>
      </div>

      <nav class="hidden md:flex space-x-10">
        <a
          href="/manager"
          class="text-base font-medium text-gray-500 hover:text-gray-900"
        >
          List
        </a>
        <a
          href="/manager/create"
          class="text-base font-medium text-gray-500 hover:text-gray-900"
        >
          Create
        </a>
      </nav>
      <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
        <a
          href="#"
          class="text-base font-medium text-gray-500 hover:text-gray-900 inline-block h-6 w-24 items-center text-center rounded-full ring-2 ring-white"
        >
            {{ user.name }}
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['user'],
  methods: {
    makeLetters() {
      const { name } = this.user
    },
  },
  mounted() {
    console.log(this.user)
    this.makeLetters()
  },
}
</script>

<style></style>
