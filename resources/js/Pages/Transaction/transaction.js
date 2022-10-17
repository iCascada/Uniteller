import AuthenticatedLayout from '@/Layouts/Auth/AuthenticatedLayout.vue';
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
import {Head} from "@inertiajs/inertia-vue3";

export default {
    name: "Transaction",
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
        transactions: {
            type: Array,
            required: true,
        }
    },
    setup(props) {
        const operations = ref([]);

        onMounted(async () => {
            operations.value = props.transactions;
        })

        function getTransactionName($type) {
            if ($type === 'funds_in') {
                return 'Funds in';
            }

            return 'Funds out';
        }

        function getDateTime(datetime) {
            const date = new Date(datetime)

            return new Intl.DateTimeFormat(
                'ru-RU',
                {
                    year: 'numeric',
                    month: 'numeric',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    second: 'numeric',
                }
            ).format(date)
        }

        return {
            operations,
            getDateTime,
            getTransactionName,
        }
    }
}
