import axios from 'axios';

const API_URL = 'https://api.example.com/events'; // Replace with your API URL

export const getEvents = async () => {
  try {
    const response = await axios.get(API_URL);
    return response.data;
  } catch (error) {
    console.error('Error fetching events:', error);
    throw error;
  }
};
