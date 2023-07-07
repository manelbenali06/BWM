import { Product } from "./product";

export interface Cart {
  product: Product;
  name:string;
  price:number;
  id:number;
  quantity:number;
  description:string;
}
