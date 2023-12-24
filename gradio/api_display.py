import gradio as gr
import json
import base64
from PIL import Image
import io

def read_json_file(file_path):
    with open(file_path, 'r') as file:
        data = json.load(file)
    return data

json_data = read_json_file('data.json')
berries_data = read_json_file('berries.json')
stats_data = read_json_file('stats.json')

def display_data(name_search):
    berry_info = "Berry not found"
    stats_info = "Stats not found"

    for pokemon in json_data:
        if pokemon.get("name", "").lower() == name_search.lower():
            name = pokemon.get("name", "N/A")
            type_info = f'{pokemon.get("type1", "N/A")} / {pokemon.get("type2", "N/A")}'
            jname = pokemon.get("jname", "N/A")
            generation = pokemon.get("generation", "N/A")
            is_legendary = 'Yes' if pokemon.get("is_legendary", 0) == 1 else 'No'
            abilities = ", ".join(json.loads(pokemon.get("abilities", "[]")))
            image_base64 = pokemon.get("image", "")
            color = pokemon.get("color", "N/A")
            habitat = pokemon.get("habitat", "N/A")
            classification = pokemon.get("classification", "N/A")
            egg = pokemon.get("egg", "N/A")
            image = Image.open(io.BytesIO(base64.b64decode(image_base64)))

            for stat in stats_data:
                if stat.get("name", "").lower() == name_search.lower():
                    stats_info = json.dumps(stat, indent=4)

            return name, type_info, jname, generation, is_legendary, abilities, color, habitat, image, stats_info, "", classification, egg

    for berry in berries_data:
        if berry.get("name", "").lower() == name_search.lower():
            berry_info = json.dumps(berry, indent=4)
            return "", "", "", "", "", "", "", "", None, "", berry_info, "", ""

    return "Not found", "", "", "", "", "", "", "", None, "", "", "", ""

iface = gr.Interface(
    fn=display_data,
    inputs=gr.Textbox(label="Enter Pokemon/Berry Name"),
    outputs=[
        gr.Textbox(label="Name"),
        gr.Textbox(label="Type"),
        gr.Textbox(label="Japanese Name"),
        gr.Textbox(label="Generation"),
        gr.Textbox(label="Is Legendary"),
        gr.Textbox(label="Abilities"),
        gr.Textbox(label="Color"),
        gr.Textbox(label="Habitat"),
        gr.Image(label="Image"),
        gr.Textbox(label="Stats Info", lines=10),
        gr.Textbox(label="Berry Info", lines=10),
        gr.Textbox(label="Classification"),  
        gr.Textbox(label="Egg Group")        
    ],
    title="Pokemon and Berry Data Display",
    description="Search for a Pokemon or Berry by name to display its data"
)

if __name__ == "__main__":
    iface.launch()
