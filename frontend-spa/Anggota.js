const Anggota = {
    template: `
    <div class="p-6 max-w-lg mx-auto bg-white rounded-xl shadow-md space-y-4 my-6">
        <h2 class="text-xl font-bold text-gray-800 border-b pb-2">Form Tambah Anggota</h2>
        
        <form @submit.prevent="simpanAnggota" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Anggota</label>
                <input type="text" v-model="form.nama" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2 border" placeholder="Masukkan nama lengkap">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" v-model="form.email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2 border" placeholder="nama@email.com">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input type="text" v-model="form.telepon" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2 border" placeholder="08xxxxxxxxxx">
            </div>
            
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200 font-semibold">
                Simpan Anggota
            </button>
        </form>
    </div>
    `,
    data() {
        return {
            form: {
                nama: '',
                email: '',
                telepon: ''
            }
        }
    },
    methods: {
        async simpanAnggota() {
    try {
        const token = localStorage.getItem("userToken");

        const response = await axios.post(
            "http://localhost/lab7_php_ci/public/index.php/anggota",
            this.form,
            {
                headers: {
                    Authorization: `Bearer ${token}`,
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                }
            }
        );

        alert(response.data.message);

        // optional reset form
        this.form = {
            nama: "",
            email: "",
            telepon: ""
        };

    } catch (error) {
        console.error(error);

        if (error.response) {
            alert(error.response.data.message || "Terjadi kesalahan.");
        } else {
            alert("Tidak dapat terhubung ke server.");
        }
    }
}
    }
}