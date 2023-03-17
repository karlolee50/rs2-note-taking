import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

axios.defaults.baseURL = "http://localhost:8000/api/v1/";

export default function useNotes() {
  const notes = ref([]);
  const note = ref([]);
  const errors = ref({});
  const router = useRouter();

  const getNotes = async () => {
    const response = await axios.get("notes");
    notes.value = response.data.data;
  };

  const getNote = async (id) => {
    const response = await axios.get(`notes/${id}`);
    note.value = response.data.data;
  };

  const storeNote = async (data) => {
    try {
      await axios.post("notes", data);
      await router.push({ name: "NoteIndex" });
    } catch (e) {
      if (e.response.status === 422) {
        errors.value = e.response.data.errors;
      }
      console.error(e);
    }
  };

  const updateNote = async (id) => {
    try {
      await axios.put(`notes/${id}`, note.value);
      await router.push({ name: "NoteIndex" });
    } catch (e) {
      if (e.response.status === 422) {
        errors.value = e.response.data.errors;
      }
      console.error(e);
    }
  };

  const destroyNote = async (id) => {
    try {
      await axios.delete(`notes/${id}`);
      await getNotes();
    } catch (e) {
      if (e.response.status === 422) {
        errors.value = e.response.data.errors;
      }
      console.error(e);
    }
  };

  return {
    notes,
    note,
    errors,
    getNotes,
    getNote,
    storeNote,
    updateNote,
    destroyNote,
  };
}
