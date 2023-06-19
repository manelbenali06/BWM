import {Product} from "../models/Product";


export interface ApiProductResponse {
  "hydra:totalItems": number;
  "hydra:member": Product[]
}
