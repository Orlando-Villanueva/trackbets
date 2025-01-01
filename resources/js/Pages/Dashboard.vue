<script setup>
import { ref, onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';

const betSlips = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get('/api/betslips', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            withCredentials: true
        });
        betSlips.value = response.data;
        console.log(betSlips.value);
    } catch (error) {
        console.error('Error fetching bet slips:', error);
    }
});


</script>

<template>
    <Head title="My Bet Slips" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                My Bet Slips
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div v-if="betSlips.length === 0" class="text-gray-500 text-center py-4">
                            No bet slips found.
                        </div>
                        
                        <div v-else class="space-y-4">
                            <div v-for="betSlip in betSlips" :key="betSlip.id" 
                                 class="border rounded-lg p-4 hover:bg-gray-50">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="font-semibold text-lg">
                                            Bet Slip #{{ betSlip.id }}
                                        </h3>
                                        <p class="text-sm text-gray-600">
                                            Stake: ${{ betSlip.total_stake }}
                                        </p>
                                        <p class="text-sm text-gray-600">
                                            Potential Payout: ${{ betSlip.total_potential_payout }}
                                        </p>
                                        <p class="text-sm text-gray-600">
                                            Total Odds: {{ betSlip.total_odds }}
                                        </p>
                                        <span :class="{
                                            'px-2 py-1 rounded-full text-xs font-semibold': true,
                                            'bg-yellow-100 text-yellow-800': betSlip.status === 'pending',
                                            'bg-green-100 text-green-800': betSlip.status === 'won',
                                            'bg-red-100 text-red-800': betSlip.status === 'lost'
                                        }">
                                            {{ betSlip.status.charAt(0).toUpperCase() + betSlip.status.slice(1) }}
                                        </span>
                                    </div>
                                    
                                    <a :href="`/betslips/${betSlip.id}`" 
                                       class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template> 