<script setup>
import PaginationLinks from './components/PaginationLinks.vue';

defineProps({
    users: Object
});

// Format date
const getDate = (date) =>
    new Date(date).toLocaleDateString('en-US',{
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    })

</script>

<template>
    <Head :title="` | ${$page.component}`" />

    <div>
      <div class="flex justify-end mb-4">
        <div class="w-1/4">
          <input type="search" placeholder="Search"/>
        </div>
      </div>

      <table>
        <thead>
          <tr class="bg-slate-300">
            <th>Avatar</th>
            <th>Name</th>
            <th>Email</th>
            <th>Registration Date</th>
            <th>Delete</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="user in users.data" :key="user.id">
            <td>
              <img :src="user.avatar ? 'storage/' + user.avatar : 'storage/avatars/default.jpg'" alt="" class="avatar"/>
            </td>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ getDate(user.created_at) }}</td>
            <td>
              <button class="bg-red-500 p-2 rounded-md text-white">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Pagination Links -->
      <div>
          <PaginationLinks :paginator="users"/>
      </div>
    </div>
  </template>
<style scoped>
</style>
