import { Product } from "../models/product";

export interface ApiProductResponse {
  "hydra:totalItems": number;
  "hydra:member": Product[]
}

