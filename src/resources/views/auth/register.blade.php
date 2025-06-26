
<div class="block items-center lg:justify-center p-6 bg-white border border-gray-200 rounded-lg shadow-sm ">

    <div class="max-w-4xl max-sm:max-w-lg mx-auto p-6 mt-6" x-data="{
        form: {
            fname: '',
            lname: '',
            email: '',
            number: '',
            password: '',
        },
        errors: {},
        loading: false,
        async submit() {
            this.loading = true;
            try {
                const response = await fetch('/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type' : 'application/json',
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content

                    },
                    body: JSON.stringify(this.form)
                })
                const data = await response.json();
                console.log(data)
                if (response.ok) {
                  window.location.href = '/login';
                } else {
                  this.errors = data.errors || {};
                }
            } catch (error) {
                console.log('Error');
            } finally {
                this.loading = false;
            }
        }
    }">
        <div class="text-center mb-12 sm:mb-16">

            <h4 class="text-slate-600 text-base mt-6">Sign up into your account</h4>
        </div>

        <form @submit.prevent="submit">
            <div class="grid sm:grid-cols-2 gap-8">
                <div>
                    <label class="text-slate-900 text-sm font-medium mb-2 block">First Name</label>
                    <input name="fname" x-model="form.fname" type="text" class="bg-slate-100 w-full text-slate-900 text-sm px-4 py-3 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter name" />
                </div>
                <div>
                    <label class="text-slate-900 text-sm font-medium mb-2 block">Last Name</label>
                    <input name="lname" x-model="form.lname" type="text" class="bg-slate-100 w-full text-slate-900 text-sm px-4 py-3 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter last name" />
                </div>
                <div>
                    <label class="text-slate-900 text-sm font-medium mb-2 block">Email Id</label>
                    <input name="email" x-model="form.email" type="text" class="bg-slate-100 w-full text-slate-900 text-sm px-4 py-3 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter email" />
                </div>
                <div>
                    <label class="text-slate-900 text-sm font-medium mb-2 block">Mobile No.</label>
                    <input name="number" x-model="form.number" type="number" class="bg-slate-100 w-full text-slate-900 text-sm px-4 py-3 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter mobile number" />
                </div>
                <div>
                    <label class="text-slate-900 text-sm font-medium mb-2 block">Password</label>
                    <input name="password" x-model="form.password" type="password" class="bg-slate-100 w-full text-slate-900 text-sm px-4 py-3 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter password" />
                </div>
{{--                <div>--}}
{{--                    <label class="text-slate-900 text-sm font-medium mb-2 block">Confirm Password</label>--}}
{{--                    <input name="cpassword" x-model="cpassword" type="password" class="bg-slate-100 w-full text-slate-900 text-sm px-4 py-3 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter confirm password" />--}}
{{--                </div>--}}

            </div>

            <div class="mt-12">
                <button type="submit" class="mx-auto block min-w-32 py-3 px-6 text-sm font-medium tracking-wider rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none cursor-pointer">
                    Sign up
                </button>
            </div>
        </form>
    </div>
</div>
