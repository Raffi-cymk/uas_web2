const Kategori = {
    data() {
        return {
            kategori: []
        }
    },

    mounted() {
        this.loadData();
    },

    methods: {
        async loadData() {
            const response = await axios.get(
                'http://localhost/lab7_php_ci/public/kategori'
            );

            this.kategori = response.data;
        }
    },

    template: `
    <div>
        <h2>Data Kategori</h2>

        <table border="1" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
            </tr>

            <tr v-for="item in kategori" :key="item.id_kategori">
                <td>{{ item.id_kategori }}</td>
                <td>{{ item.nama_kategori }}</td>
            </tr>
        </table>
    </div>
    `
}