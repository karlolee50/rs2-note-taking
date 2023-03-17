import { ref } from "vue";
import axios from "axios";

axios.defaults.baseURL = "http://localhost:8000/api/v1/";

export default function useLabels() {
  const labels = ref([]);

  const getLabels = async () => {
    const response = await axios.get("labels");
    labels.value = response.data.data;
  };

  return {
    labels,
    getLabels,
  };
}
