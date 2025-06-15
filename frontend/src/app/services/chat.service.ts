import { Injectable } from '@angular/core';
import { ApiService } from './api.service';
import { ChatMessage } from '../models/chat-message';

@Injectable({
  providedIn: 'root'
})
export class ChatService {

  constructor(private api: ApiService) { }

  async sendMessage(message: string)
  {
    const response = await this.api.post("chat", { "message" : message })
    console.log("RESPUESTA: ", response)

    const data: any = response.data
    if(!data)
    {
      return null;
    }

    const newMessage = data.message

    return this.createNewChatMessage(newMessage, false)
  }

  createNewChatMessage(message: string, isSelf: boolean)
  {
    const chatMessage: ChatMessage = {
      content: message,
      isSelf: isSelf
    }

    return chatMessage
  }
}
