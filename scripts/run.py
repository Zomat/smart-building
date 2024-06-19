import requests
import paho.mqtt.client as mqtt
import json

# MQTT Settings
MQTT_BROKER = "192.168.0.193"
MQTT_PORT = 1883  # Default MQTT port
MQTT_TOPIC_REQUEST = "esp/request"
MQTT_TOPIC_RESPONSE = "esp/response"
# HTTP Settings
host = "192.168.0.27:8000"
url = f"http://{host}/api/request-access"

# Callback when the client receives a CONNACK response from the server
def on_connect(client, userdata, flags, rc):
    print(f"Connected with result code {rc}")
    client.subscribe(MQTT_TOPIC_REQUEST)

# Callback when a PUBLISH message is received from the server
def on_message(client, userdata, msg):
    print(f"Message received: {msg.topic} {msg.payload}")
    try:
        payload = msg.payload.decode('utf-8')
        data = json.loads(payload)
        response = requests.post(url, json=data)
        response.raise_for_status()
        response_payload = response.json()
        response_payload_str = json.dumps(response_payload).replace("True", "true").replace("False", "false")
        client.publish(MQTT_TOPIC_RESPONSE, str(response_payload_str))
        print(response.json())
    except requests.exceptions.RequestException as e:
        print(f"Request failed: {e}")

# Initialize MQTT Client
client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message

# Connect to MQTT Broker
client.connect(MQTT_BROKER, MQTT_PORT, 60)

# Blocking call that processes network traffic, dispatches callbacks and handles reconnecting
client.loop_forever()
