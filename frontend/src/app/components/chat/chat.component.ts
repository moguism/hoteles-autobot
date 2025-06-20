import { Component } from '@angular/core';
import { ChatMessageComponent } from '../../components/chat-message/chat-message.component';
import { FormsModule } from '@angular/forms';
import { ChatMessage } from '../../models/chat-message';
import { ChatService } from '../../services/chat.service';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-chat',
  imports: [ChatMessageComponent, FormsModule, CommonModule],
  templateUrl: './chat.component.html',
  styleUrl: './chat.component.css'
})
export class ChatComponent {

  constructor(private chatService: ChatService){}

  messageToSend: string = ""

  messages: ChatMessage[] = [{
    content: "Hola, ¿en qué puedo ayudarte?",
    isSelf: false
  }]

  isChatVisible = false;

  toggleChat() {
    this.isChatVisible = !this.isChatVisible;
  }

  async sendMessage()
  {
    const message = this.messageToSend.trim()
    if(message === '')
    {
      return;
    }

    const responseMessage = await this.chatService.sendMessage(message)
    if(responseMessage)
    {
      this.messages.push(this.chatService.createNewChatMessage(message, true))
      this.messages.push(responseMessage)
      this.messageToSend = ""
    }
  }
}
