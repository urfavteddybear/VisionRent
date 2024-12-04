<template>
    <div>
      <h1 class="text-xl font-bold">Profil Saya</h1>

      <div>
        <h2 class="text-lg">Peminjaman Aktif</h2>
        <ul>
          <li v-for="rental in activeRentals" :key="rental.id">
            {{ rental.item.name }} - Sisa waktu: {{ rental.remainingDays }} hari
          </li>
        </ul>
      </div>

      <div>
        <h2 class="text-lg">Riwayat Peminjaman</h2>
        <ul>
          <li v-for="rental in historyRentals" :key="rental.id">
            {{ rental.item.name }}
          </li>
        </ul>
      </div>
    </div>
  </template>
