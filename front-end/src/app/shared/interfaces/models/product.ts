import { Cart } from "./cart";
import { Category } from "./category";
export interface Product{
  "@id" ?:string;//le typage d emes variables
  id: number;
  name: string;
  description:string;
  price:number
  image:string;
  quantity:number;
  category:Category;
  cart:Cart;


}
