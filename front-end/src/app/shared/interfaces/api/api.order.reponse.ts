import { Order } from"../models/order";
export interface ApiOrderResponse {
  "hydra:totalItems": number;
  "hydra:member": Order[]
}
