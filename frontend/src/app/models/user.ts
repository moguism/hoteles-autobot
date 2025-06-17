import { Wishlist } from "./wishlist";

export interface User {
  id: number,
  name: string,
  email: string,
  wishlists: Wishlist[]
}
