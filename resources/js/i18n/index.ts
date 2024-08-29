import { en, pt } from "vuetify/locale";
import enUS from "./en-US";
import ptBR from "./pt-BR";

const messages = {
  "en-US": {
    ...enUS,
    $vuetify: {
      ...en,
      dataIterator: {
        rowsPerPageText: "Items per page:",
        pageText: "{0}-{1} of {2}",
        prevPageLabel: "Previous",
        nextPageLabel: "Next",
        loadingText: "Loading",
      },
    },
  },
  "pt-BR": {
    ...ptBR,
    $vuetify: {
      ...pt,
      dataIterator: {
        rowsPerPageText: "Items por página:",
        pageText: "{0}-{1} de {2}",
        prevPageLabel: "Anterior",
        nextPageLabel: "Próximo",
        loadingText: "Carregando",
      },
    },
  },
};

export default messages;
