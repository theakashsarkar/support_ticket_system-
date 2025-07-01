@extends('layouts.auth')

@section('content')
    <div x-data="ticketDashboard()" class="max-w-7xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Support Ticket Dashboard</h1>

        {{-- Stats --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded shadow text-center">
                <p class="text-sm text-gray-500">Open</p>
                <p class="text-2xl font-bold text-blue-600" x-text="countByStatus('open')"></p>
            </div>
            <div class="bg-white p-6 rounded shadow text-center">
                <p class="text-sm text-gray-500">In Progress</p>
                <p class="text-2xl font-bold text-yellow-500" x-text="countByStatus('in_progress')"></p>
            </div>
            <div class="bg-white p-6 rounded shadow text-center">
                <p class="text-sm text-gray-500">Resolved</p>
                <p class="text-2xl font-bold text-green-600" x-text="countByStatus('resolved')"></p>
            </div>
        </div>

        {{-- Filter + Create --}}
        <div class="flex justify-between items-center mb-4">
            <div>
                <label class="text-sm text-gray-700 mr-2">Filter:</label>
                <select x-model="filter" class="border-gray-300 rounded px-2 py-1 text-sm">
                    <option value="">All</option>
                    <option value="open">Open</option>
                    <option value="in_progress">In Progress</option>
                    <option value="resolved">Resolved</option>
                </select>
            </div>
            <button @click="openModal = true"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                + New Ticket
            </button>
        </div>

        {{-- Tickets Table --}}
        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3">Subject</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Priority</th>
                    <th class="px-6 py-3">Created</th>
                </tr>
                </thead>
                <tbody>
                <template x-for="ticket in filteredTickets()" :key="ticket.id">
                    <tr class="border-t">
                        <td class="px-6 py-3" x-text="ticket.subject"></td>
                        <td class="px-6 py-3">
                            <span class="px-2 py-1 rounded text-white text-xs"
                                  :class="{
                                      'bg-blue-500': ticket.status === 'open',
                                      'bg-yellow-500': ticket.status === 'in_progress',
                                      'bg-green-600': ticket.status === 'resolved'
                                  }"
                                  x-text="formatStatus(ticket.status)">
                            </span>
                        </td>
                        <td class="px-6 py-3 capitalize" x-text="ticket.priority"></td>
                        <td class="px-6 py-3" x-text="ticket.created_at"></td>
                    </tr>
                </template>
                </tbody>
            </table>
        </div>

        {{-- Create Ticket Modal --}}
        <div x-show="openModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
            <div class="bg-white p-6 rounded-lg shadow max-w-md w-full">
                <h2 class="text-lg font-bold mb-4">Create Ticket</h2>
                <div class="mb-3">
                    <label class="block text-sm mb-1">Subject</label>
                    <input type="text" x-model="newTicket.subject" class="w-full border px-3 py-2 rounded text-sm">
                </div>
                <div class="mb-3">
                    <label class="block text-sm mb-1">Description</label>
                    <textarea x-model="newTicket.description" class="w-full border px-3 py-2 rounded text-sm"></textarea>
                </div>
                <div class="mb-3">
                    <label class="block text-sm mb-1">Priority</label>
                    <select x-model="newTicket.priority" class="w-full border px-3 py-2 rounded text-sm">
                        <option value="low">Low</option>
                        <option value="medium" selected>Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-2">
                    <button @click="openModal = false"
                            class="px-4 py-2 border rounded text-sm hover:bg-gray-100">Cancel</button>
                    <button @click="addTicket"
                            class="px-4 py-2 bg-blue-600 text-white rounded text-sm hover:bg-blue-700">Create</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function ticketDashboard() {
            return {
                openModal: false,
                filter: '',
                newTicket: {
                    subject: '',
                    description: '',
                    priority: 'medium',
                },
                tickets: [
                    { id: 1, subject: 'Login Issue', status: 'open', priority: 'high', created_at: '2 hours ago' },
                    { id: 2, subject: 'Billing Question', status: 'resolved', priority: 'low', created_at: '1 day ago' },
                    { id: 3, subject: 'Website Down', status: 'in_progress', priority: 'high', created_at: '3 days ago' },
                ],
                formatStatus(status) {
                    return status.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase());
                },
                countByStatus(status) {
                    return this.tickets.filter(t => t.status === status).length;
                },
                filteredTickets() {
                    if (this.filter === '') return this.tickets;
                    return this.tickets.filter(t => t.status === this.filter);
                },
                addTicket() {
                    const id = this.tickets.length + 1;
                    const ticket = {
                        id,
                        subject: this.newTicket.subject,
                        status: 'open',
                        priority: this.newTicket.priority,
                        created_at: 'Just now'
                    };
                    this.tickets.unshift(ticket);
                    this.newTicket.subject = '';
                    this.newTicket.description = '';
                    this.newTicket.priority = 'medium';
                    this.openModal = false;
                }
            }
        }
    </script>
@endpush
