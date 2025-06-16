from typing import Any, Text, Dict, List
from rasa_sdk import Action, Tracker
from rasa_sdk.executor import CollectingDispatcher
import requests
import constants

class ActionUnknownQuery(Action):
    # El nombre de la acción para ponerla en el "domain.yml"
    def name(self) -> str:
        return "action_unknown_query"

    def run(self, dispatcher: CollectingDispatcher, tracker: Tracker, domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        response = requests.get(str(constants.API_URL, "hotels-services/all"))
        json = response.json()

        # Por ahora se devuelve siempre un array vacío y el "utter_message" es el mensaje que devuelve
        dispatcher.utter_message(text=json)
        return []
    