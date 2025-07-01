@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow" x-data="ticketForm()">
        <h2 class="text-2xl font-bold mb-4">🎫 Submit a New Ticket</h2>

        <form @submit.prevent="submit">
            <!-- Subject -->
            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Subject</label>
                <input type="text" x-model="form.subject" class="w-full border border-gray-300 p-2 rounded" placeholder="e.g. Can't login" required>
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Category</label>
                <select x-model="form.category" class="w-full border border-gray-300 p-2 rounded">
                    <option>Technical</option>
                    <option>Billing</option>
                    <option>General</option>
                </select>
            </div>

            <!-- Priority -->
            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Priority</label>
                <select x-model="form.priority" class="w-full border border-gray-300 p-2 rounded">
                    <option>Low</option>
                    <option>Medium</option>
                    <option>High</option>
                    <option>Urgent</option>
                </select>
            </div>

            <!-- Message -->
            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Message</label>
                <textarea x-model="form.message" rows="4" class="w-full border border-gray-300 p-2 rounded" placeholder="Describe the issue..." required></textarea>
            </div>

            <!-- Submit Button + Status -->
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" :disabled="loading">
                    Submit Ticket
                </button>
                <span class="text-sm text-gray-500" x-text="status"></span>
            </div>
        </form>
    </div>

    <script>
        function ticketForm() {
            return {
                form: {
                    subject: '',
                    category: 'Technical',
                    priority: 'Low',
                    message: '',
                },
                status: 'Idle',
                loading: false,
                submit() {
                    this.loading = true;
                    this.status = 'Submitting...';

                    fetch("{{ route('tickets.store') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(this.form)
                    })
                        .then(response => response.json())
                        .then(data => {
                            this.status = '✅ Submitted!';
                            this.loading = false;
                            this.form.subject = '';
                            this.form.message = '';
                        })
                        .catch(() => {
                            this.status = '❌ Error submitting ticket';
                            this.loading = false;
                        });
                }
            }
        }
    </script>
@endsection
