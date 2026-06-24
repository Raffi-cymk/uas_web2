const { createApp } = Vue;
const { createRouter, createWebHashHistory } = VueRouter;

// URL Backend API
const apiUrl = 'http://localhost/lab7_php_ci/public';

axios.interceptors.request.use(
    config => {
        const token = localStorage.getItem('token'); // Pastikan key-nya sesuai dengan yang Anda simpan saat login
        if (token) {
            config.headers['Authorization'] = `Bearer ${token}`; // Menyuntikkan Bearer Token [cite: 27]
        }
        return config;
    },
    error => {
        return Promise.reject(error);
    }
);

const routes = [

    {
        path: '/',
        component: Home
    },

    {
        path: '/login',
        component: Login
    },

    {
        path: '/artikel',
        component: Artikel,
        meta: {
            requiresAuth: true
        }
    },

    {
        path: '/about',
        component: About
    },

    {
        path: '/dashboard',
        component: Dashboard,
        meta: {
            requiresAuth: true
        }
    },

    {
        path: '/buku',
        component: Buku,
        meta: {
            requiresAuth: true
        }
    },

    {
        path: '/kategori',
        component: Kategori,
        meta: {
            requiresAuth: true
        }
    },

    {
        path: '/anggota',
        component: Anggota,
        meta: {
            requiresAuth: true
        }
    }

];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});

router.beforeEach((to, from, next) => {

    const isAuthenticated =
        localStorage.getItem('isLoggedIn') === 'true';

    if (
        to.matched.some(record => record.meta.requiresAuth)
        && !isAuthenticated
    ) {

        alert('Akses Ditolak! Anda harus login terlebih dahulu.');

        next('/login');

    } else {

        next();

    }

});

const app = createApp({

    data() {

        return {
            isLoggedIn: false
        }

    },

    mounted() {

        this.isLoggedIn =
            localStorage.getItem('isLoggedIn') === 'true';

    },

    methods: {

        logout() {

            if(confirm('Apakah Anda yakin ingin logout?')) {

                localStorage.removeItem('isLoggedIn');
                localStorage.removeItem('userToken');

                this.isLoggedIn = false;

                this.$router.push('/');

                window.location.reload();

            }

        }

    }

});

app.use(router);

app.mount('#app');