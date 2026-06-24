const Buku = {

    data() {

        return {

            buku: [],

            form: {
    judul: '',
    penulis: '',
    penerbit: '',
    tahun_terbit: '',
    kategori_id: ''
}

        }

    },

    mounted() {

        this.loadData();

    },

    methods: {

        async loadData() {

            const response = await axios.get(
                'http://localhost/lab7_php_ci/public/buku'
            );

            this.buku = response.data;

        },

        async simpanBuku() {

            await axios.post(
                'http://localhost/lab7_php_ci/public/buku',
                this.form
            );

            this.form.judul = '';
this.form.penulis = '';
this.form.penerbit = '';
this.form.tahun_terbit = '';
this.form.kategori_id = '';

            this.loadData();

        }

    },

    template: `

    <div>

        <h2>Data Buku</h2>

        <h3>Tambah Buku</h3>

        <p>
            Judul :
            <input
                type="text"
                v-model="form.judul">
        </p>

        <p>
            Penulis :
            <input
                type="text"
                v-model="form.penulis">
        </p>

        <p>
    Penerbit :
    <input
        type="text"
        v-model="form.penerbit">
</p>

<p>
    Tahun Terbit :
    <input
        type="number"
        v-model="form.tahun_terbit">
</p>
    

        <p>
            ID Kategori :
            <input
                type="number"
                v-model="form.kategori_id">
        </p>

        <p>
            <button @click="simpanBuku()">
                Simpan Buku
            </button>
        </p>

        <hr>

        <table border="1" cellpadding="5">

            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
            </tr>

            <tr
                v-for="item in buku"
                :key="item.id">

                <td>{{ item.id }}</td>
                <td>{{ item.judul }}</td>
                <td>{{ item.penulis }}</td>
                <td>{{ item.id_kategori }}</td>

            </tr>

        </table>

    </div>

    `

}