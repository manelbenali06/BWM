import { User } from"../models/user";
export interface ApiUserResponse {
  "hydra:totalItems": number;
  "hydra:member": User[]
}
