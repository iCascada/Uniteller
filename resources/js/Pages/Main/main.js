import AuthenticatedLayout from '@/Layouts/Auth/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import {
    CAlert,
    CTable,
    CTableBody,
    CTableDataCell,
    CTableHead,
    CTableHeaderCell,
    CTableRow
} from "@coreui/bootstrap-vue";
import {onMounted, ref} from "vue";

export default {
    name: 'Main',
    components: {
        AuthenticatedLayout,
        Head,
        CTable,
        CTableHead,
        CTableRow,
        CTableHeaderCell,
        CTableBody,
        CTableDataCell,
        CAlert,
    },
    props: {
        account: {
            type: Object,
            required: true,
        },
        transactions: {
            type: Array,
            required: true,
        }
    },
    setup: (props) => {
        const balance = ref(0);
        const operations = ref([]);
        const timeout = 10000;

        onMounted(async () => {
            balance.value = props.account.value;
            operations.value = props.transactions;

            setInterval(async function () {
                const response = await axios.get(route('account'))

                balance.value = response.data.account.value;
                operations.value = response.data.transactions;
            }, timeout)
        })

        function getTransactionName(type) {
            if (type === 'funds_in') {
                return 'Funds in';
            }

            return 'Funds out';
        }

        return {
            balance,
            operations,
            getTransactionName,
        }
    },
}
